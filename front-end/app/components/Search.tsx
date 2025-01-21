import { Calendar, MapPin, PointerIcon, Search, SearchCheck, SearchX, Users } from "lucide-react"
import { motion } from "motion/react"

export const SearchCard = () => {
    return (
        <motion.div initial={{ y: -35, opacity: 0 }} animate={{ y: 0, opacity: 1 }} className="min-w-2/3 max-w-[55rem] m-auto drop-shadow bg-white py-6 flex justify-center items-center gap-10 rounded-2xl">
            <div className="border-r pr-4">
                <p className="flex items-center gap-2">
                    <MapPin size={20}/> Local
                </p>
                <input placeholder="Qual local procura?" className="bg-transparent"/>
            </div>
            <div className="border-r pr-4">
                <p className="flex items-center gap-2"> 
                    <Calendar size={20}/> Data
                </p>
                <input placeholder="Dia da reserva" className="bg-transparent"/>
            </div>
            <div>
                <p className="flex items-center gap-2">
                    <Users size={20}/> Capacidade
                </p>
                <input placeholder="Quantas pessoas?" className="bg-transparent"/>
            </div>
            {/* <Search/> */}
        </motion.div>
    )
}